function teamForm(action, selectedTeam) {
    return {
        action,
        errors: {},
        loading: true,
        form: {
            id: "",
            team_profile: "",
            team_name: "",
        },

        async submit() {
            this.errors = {};
            this.loading = true;

            const formData = new FormData();
            formData.append('team_name', this.form.team_name);

            const fileInput = document.querySelector('#team_profile');
            if (fileInput && fileInput.files.length > 0) {
                formData.append('team_profile', fileInput.files[0]);
            }

            const url = this.action === "update" || this.action === "delete"
                ? `/api/teams/${this.form.id}`
                : "/api/teams";

            const method = this.action === "update"
                ? "POST" // Change to POST with `_method` = PATCH if using FormData
                : this.action === "delete"
                ? "POST"
                : "POST";

            if (this.action === "update") {
                formData.append('_method', 'PUT');
            }
            if (this.action === "delete") {
                formData.append('_method', 'DELETE');
            }

            try {
                const response = await fetch(url, {
                    method: "POST", // Always POST when sending FormData
                    headers: {
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: formData,
                    credentials: "include",
                });

                const data = await response.json();
                console.log(data);

                if (!response.ok) {
                    if (response.status === 422) {
                        this.errors = data.errors;
                    }
                    return;
                }

                Alpine.store("toast").trigger(data.message, "success");
                this.resetForm();
                this.$dispatch("close");
            } catch (error) {
                console.error("Submit Error:", error);
                Alpine.store("toast").trigger("Something went wrong", "error");
            } finally {
                setTimeout(() => {
                    this.loading = false;
                }, 2000);
            }
        },

        resetForm() {
            this.form = {
                id: null,
                team_profile: "",
                team_name: "",
            };
            this.errors = {};
        },
    };
}
