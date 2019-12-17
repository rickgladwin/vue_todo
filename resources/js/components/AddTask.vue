<template>
    <div>
        <form class="form-inline header-form">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <input type="text" v-model="task_name" name="task_name" placeholder="Task Name" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-4">
                    <input type="button" value="Add Task" class="btn btn-info form-control todo-header-button" @click="addTask">
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    // import uuid from 'uuid';

    export default {
        name: "AddTask",
        data() {
            return {
                task_name: ''
            }
        },
        methods: {
            addTask() {
                //build the new task's required data
                const newTask = {
                    // id: uuid(),
                    name: this.task_name,
                    complete: false,
                    status_id: 1,
                    status_name: 'current'
                };
                //emit to main
                this.$emit('add-task', newTask);
                //clear the form field
                this.task_name = '';
            }
        }
    }
</script>
