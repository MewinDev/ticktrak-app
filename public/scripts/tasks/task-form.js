function taskForm(action, selectedTask) {
    return {
        action,
        errors: {},
        loading: true,
        form: {
            id: '',
            title: '',
            priority: '',
            due_date: '',
            details: ''
        },

        async submit() {
            this.errors = {};
            this.loading = true;
            const taskId = this.selectedTask?.id;
            if (this.action === 'update' || this.action === 'delete') {
                this.form.id = taskId;
            }
            if (this.action === 'update') {
                this.form.title = this.selectedTask.title;
                this.form.priority = this.selectedTask.priority;
                this.form.due_date = this.selectedTask.due_date;
                this.form.details = this.selectedTask.details;
            }
            if (this.action === 'delete') {
                this.form.title = this.selectedTask.title;
            }

            const url = this.action === 'update' || this.action === 'delete' ?
                `/api/tasks/${taskId}` :
                '/api/tasks';

            const method = this.action === 'update' ? 'PUT' : this.action === 'delete' ? 'DELETE' : 'POST';

            try {
                const response = await fetch(url, {
                    method,
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify(this.form),
                    credentials: 'include',
                });
                const data = await response.json();

                if (!response.ok) {
                    if (response.status === 422) {
                        this.errors = data.errors;
                    }
                    return;
                }

                this.message = data.message;
                this.type = 'success';
                this.show = true;
                // ✅ Success: Trigger the toast
                Alpine.store('toast').trigger(data.message, 'success');
                Alpine.store('taskEvents').reload = Date.now();
                this.resetForm();
                this.$dispatch('close');
            } catch (error) {
                console.error('Submit Error:', error);
                Alpine.store('toast').trigger('Something went wrong', 'error');
                this.message = 'Something went wrong';
                this.type = 'error';
                this.show = true;
            } finally {
                setTimeout(() => {
                    this.loading = false;
                }, 2000);
            }
        },

        resetForm() {
            this.form = {
                id: null,
                title: '',
                priority: '',
                due_date: '',
                details: ''
            };
            this.errors = {};
        }
    };
}
