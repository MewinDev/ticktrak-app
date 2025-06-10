function subTaskTable(taskId) {
    return {
        taskId,
        subTasks: [],
        selectedSubTask: {},
        search: "",
        loading: false,
        showCompleteAlert: false,

        async loadSubTasks() {
            // this.loading = true;

            const param = new URLSearchParams({
                search: this.search,
            });

            const url = `/api/tasks/${
                this.taskId
            }/subtasks?${param.toString()}`;

            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error("Failed to fetch subTasks");
                }

                const data = await response.json();
                this.subTasks = data.all_subtasks;

                this.updateChart();
            } catch (error) {
                console.log("Error loading subTasks:", error);
                Alpine.store("toast").trigger(
                    "Failed to load sub-tasks.",
                    "error"
                );
            } finally {
                this.loading = false;
            }
        },

        async updateAsComplete(subTaskId, status) {
            const url = `/api/tasks/${this.taskId}/subtasks/${subTaskId}`;

            try {
                const response = await fetch(url, {
                    method: "PATCH",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({
                        is_complete: !status,
                    }),
                    credentials: "include",
                });

                if (!response.ok) {
                    throw new Error("Failed to update status to completed");
                }

                await this.loadSubTasks();
            } catch (error) {
                console.log("Update Error", error);
                Alpine.store("toast").trigger(
                    "Failed to update status",
                    "error"
                );
            }
        },

        async updateTaskStatus(status) {
            const url = `/api/tasks/${this.taskId}`;

            try {
                const response = await fetch(url, {
                    method: "PATCH",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({ status }),
                    credentials: "include",
                });

                if (!response.ok) {
                    throw new Error("Failed to update status to completed");
                }
                const data = await response.json();

                this.message = data.message || "Task completed successfully";
                this.type = "success";
                this.show = true;
                Alpine.store("toast").trigger(this.message, this.type);
                this.$dispatch("close");
            } catch (error) {
                console.log("Update Error", error);
                Alpine.store("toast").trigger(
                    "Failed to update status",
                    "error"
                );
            }
        },

        formatDate(date) {
            if (!date) return "";
            return new Date(date).toLocaleDateString("en-US", {
                year: "numeric",
                month: "long",
                day: "2-digit",
            });
        },

        getProgress() {
            if (this.subTasks.length === 0) return 0;
            const completed = this.subTasks.filter(
                (st) => st.is_complete
            ).length;

            return Math.round((completed / this.subTasks.length) * 100);
        },

        updateChart() {
            const progress = this.getProgress();
            window.currentProgress = progress;

            if (window.taskChartInstance) {
                window.taskChartInstance.updateSeries([progress]);
            }

            this.showCompleteAlert = progress === 100;

            if (progress === 100) {
                confetti({
                    particleCount: 300,
                    spread: 100,
                    angle: 1, // shoots toward bottom-right
                    origin: {
                        x: -0.1,
                        y: 0,
                    },
                    startVelocity: 70,
                });
            }
        },
    };
}
