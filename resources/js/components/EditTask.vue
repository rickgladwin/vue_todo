<template>
    <div>
        <form ref="edit_form" class="task-edit-form" :id="'edit_form_' + task.id">
            <div class="form-group">
                <label :for="'task_name' + task.id">Task Name</label>
                <input :id="'task_name' + task.id" name="task_name" v-model="task.name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label :for="'task_due_date' + task.id">Due Date (optional)</label>
                <input :id="'task_due_date' + task.id" name="task_due_date" v-model="task.target_completion_date" placeholder="YYYY-MM-DD" type="text" class="form-control">
            </div>

            <input type="button" class="btn btn-secondary btn-sm" value="Cancel" onclick="this.parentNode.style.display = 'none'">
            <input type="button" class="btn btn-success btn-sm" value="Submit" @click="submitEditForm">
        </form>
    </div>
</template>

<script>

    export default {
        name: "EditTask",
        props: ['task'],
        methods: {
            submitEditForm() {
                //emit the edit-task event and task
                this.$emit('edit-task', this.task);
                //hide the edit panel
                console.log('this: ', this);
                this.$refs.edit_form.style.display = 'none';
            }
        }

    }
</script>

<style scoped>
    .task-edit-form {
        position: absolute;
        right: -19px;
        z-index: 2;
        background-color: rgba(255,255,255,0.85);
        padding: 15px;
        top: 32px;
        border-radius: 5px;
        border: 2px solid rgba(55,55,55,0.85);
        width: 100%;
        min-width: 210px;
        display: none;
    }
</style>
