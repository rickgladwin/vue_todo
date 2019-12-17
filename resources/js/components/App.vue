<template>
    <div>
        <div class="row">
            <div class="col-xs-12 full-width">
                <h1 class="app-title">To Dos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 full-width border-bottom">
                <AddTask v-on:add-task="addTask"/>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 full-width">
                <Search
                    v-on:filter-dates="filterDates"
                    v-on:clear-filter="getAllTasks"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 full-width">
                <Tasks v-bind:tasks="tasks"
                       @delete-task="deleteTask"
                       @toggle-complete="updateTask"
                       @toggle-status="updateTask"
                       @edit-task="updateTask"

                />
            </div>
        </div>
    </div>
</template>

<script>

    import Search from "./Search";
    import Tasks from "./Tasks";
    import AddTask from "./AddTask";
    import axios from 'axios';

    export default {
        name: 'app',
        components: {
            Search,
            Tasks,
            AddTask
        },
        data() {
            return {
                tasks: [
                ]
            }
        },
        methods: {
            deleteTask(id) {
                console.log('delete-task id=' + id + ' detected by App');
                //destroy the task database record
                axios.delete('api/task/' + id)
                    //remove the target task from tasks
                    .then(response => this.tasks = this.tasks.filter(task => task.id !== id))
                    .catch(err => console.log(err));
            },
            updateTask(targetTask) {
                console.log('toggle-complete, toggle-status, or edit task on App with ', targetTask);
                //get the id and complete status from the emission via decomposition
                const { id, name, description, complete, status_id, target_completion_date } = targetTask;
                //update the database record
                axios.put('/api/task/' + id, {
                    id,
                    name,
                    description,
                    complete,
                    status_id,
                    target_completion_date
                })
                    .then(this.getAllTasks)
                    .catch(err => console.log(err))
            },
            addTask(newTask) {
                //get the required fields from the new task
                const { name, complete, status_id } = newTask;
                //add the new task to the database via api request
                axios.post('/api/task', {
                    name,
                    complete,
                    status_id
                })
                    //then add the new task to the tasks object in the virtual DOM
                    .then(response => this.tasks = [...this.tasks, response.data])
                    .catch(err => console.log(err));


            },
            filterDates(search_date) {
                //filter tasks based on task.target_completion_date
                console.log('filtering for date', search_date);
                this.tasks = this.tasks.filter(task => task.target_completion_date === search_date);
            },
            getAllTasks() {
                //get the existing task list from the database
                axios.get('/api/tasks')
                    .then((response) => {
                        this.tasks = response.data;
                        console.log(response.data);
                    })
                    .catch(err => console.log(err));

            }
        },
        created() {
            this.getAllTasks();
        }
    }
</script>

<style>
    form.form-inline {
        /*margin: 0 0 15px 0;*/
        margin: 0 0 0 0;
    }

    .todo-header-button {
        min-width: 100px;
    }

    form.header-form {
        margin: 10px 15px;
    }
</style>

<style scoped>
    .app-title {
        margin: 15px;
    }

    .full-width {
        width: 100%;
    }
</style>
