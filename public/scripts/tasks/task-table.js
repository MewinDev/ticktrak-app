function taskTable() {
    return {
        tasks: [],
        selectedTask: {},
        loading: false,
        search: '',
        perPage: 5,
        perPageOptions: [5, 10, 25, 50, 100, 250, 500, 'All'],
        pagination: {
            current_page: 1,
            last_page: 1,
            per_page: 5,
            total: 0,
        },

        async loadTasks(page = 1) {
            // this.loading = true;

            const params = new URLSearchParams({
                page: page,
                per_page: this.perPage === 'All' ? this.pagination.total : this.perPage,
                search: this.search,
            });

            const url = `/api/tasks?${params.toString()}`;

            try {
                const response = await fetch(url);

                if (!response.ok) {
                    throw new Error('Failed to fetch task table');
                }

                const data = await response.json();

                const paginated = data.paginated_tasks;

                this.tasks = paginated.data;
                this.pagination.current_page = paginated.current_page;
                this.pagination.last_page = paginated.last_page;
                this.pagination.per_page = paginated.per_page;
                this.pagination.total = paginated.total;

            } catch (error) {
                console.log('Error Response:', error);
                Alpine.store('toast').trigger('Failed to load tasks.', 'error');
            } finally {
                this.loading = false;
            }
        },

        formatDate(date) {
            if (!date) return '';
            return new Date(date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: '2-digit'
            });
        },

        from() {
            if (this.pagination.total === 0) return 0;
            return (this.pagination.current_page - 1) * this.pagination.per_page + 1;
        },

        to() {
            if (this.pagination.total === 0) return 0;
            const end = this.pagination.current_page * this.pagination.per_page;
            return Math.min(end, this.pagination.total);
        },

        goToPage(page) {
            if (page >= 1 && page <= this.pagination.last_page && page !== this.pagination.current_page) {
                this.loadTasks(page);
            }
        },

        paginationRange() {
            const totalPages = this.pagination.last_page;
            const currentPage = this.pagination.current_page;
            const maxVisible = 3;
            const pages = [];

            if (totalPages <= maxVisible) {
                for (let i = 1; i <= totalPages; i++) {
                    pages.push(i);
                }
            } else {
                const side = Math.floor(maxVisible / 2);
                let start = Math.max(2, currentPage - side);
                let end = Math.min(totalPages - 1, currentPage + side);

                if (currentPage <= side) {
                    end = maxVisible - 1;
                }

                if (currentPage + side >= totalPages) {
                    start = totalPages - (maxVisible - 2);
                }

                pages.push(1); // always show first page

                if (start > 2) {
                    pages.push('...');
                }

                for (let i = start; i <= end; i++) {
                    pages.push(i);
                }

                if (end < totalPages - 1) {
                    pages.push('...');
                }

                pages.push(totalPages); // always show last page
            }

            return pages;
        },
    };
}
