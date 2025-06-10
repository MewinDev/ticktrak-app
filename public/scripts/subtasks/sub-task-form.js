function subTaskForm(action, taskId, selectedSubTask) {
    return {
        action,
        errors: {},
        loading: false,
        form: {
            description: '',
            due_date: '',
        },

        async submit() {
            this.errors = {};
            this.loading = true;

            const subTaskId = this.selectedSubTask?.id;

            const url = this.action === 'update' || this.action === 'delete' ?
                `/api/tasks/${taskId}/subtasks/${subTaskId}` :
                `/api/tasks/${taskId}/subtasks`;

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
                });

                const data = await response.json();
                if (!response.ok) {
                    if (response.status === 422) {
                        this.errors = data.errors
                    }
                    return;
                }

                this.message = data.message || 'Sub-task updated successfully';
                this.type = 'success';
                this.show = true;
                this.resetForm();
                Alpine.store('toast').trigger(this.message, this.type);
                Alpine.store('taskEvents').reload = Date.now();
                this.$dispatch('close');
            } catch (error) {
                console.log('Error:', error);
                Alpine.store('toast').trigger('An error occurred while processing your request.', 'error');
                this.message = 'An error occurred while processing your request.';
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
                description: '',
                due_date: '',
            };
            this.errors = {};
        }
    }
}
