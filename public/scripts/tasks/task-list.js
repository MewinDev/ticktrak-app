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
function taskRow(task) {
    return {
        task,
        progress: 0,
        get target() {
            const subTasks = this.task.sub_tasks || [];
            const total = subTasks.length;
            if (total === 0) return 0;
            const completed = subTasks.filter(sub => sub.is_complete === 1).length;
            return Math.round((completed / total) * 100);
        },
        startProgress() {
            this.progress = 0;
            const interval = setInterval(() => {
                if (this.progress < this.target) {
                    this.progress++;
                } else {
                    clearInterval(interval);
                }
            }, 15);
        }
    };
}

function progress(targetValue) {
    return {
        progress: 0,
        target: targetValue,
        startProgress() {
            const step = () => {
                if (this.progress < this.target) {
                    // Increase smoothly but not more than target
                    this.progress += Math.max(1, Math.ceil((this.target - this.progress) / 20));
                    if (this.progress > this.target) this.progress = this.target;
                    requestAnimationFrame(step);
                }
            };
            requestAnimationFrame(step);
        }
    };
}
