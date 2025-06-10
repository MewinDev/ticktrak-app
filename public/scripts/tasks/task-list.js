function taskList() {
    return {
        tasks: [],
        selectedTask: {},
        loading: false,
        search: '',

        async loadTasks() {

            const params = new URLSearchParams({
                search: this.search,
            });

            this.loading = true;

            const url = `/api/tasks?${param.toString()}`;

            try {
                const response = await fetch(url);

                if (!response.ok) {
                    throw new Error('Failed to fetch tasks list');
                }

                const data = await response.json();
                this.tasks = data.all_tasks;
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
    };
}
