<template>
    <div>
        <div class="task-item" v-bind:class="{'task-item-completed':task.complete}">
            <div class="task-completed-marker form-check form-check-inline">
                <input type="checkbox" class="form-check-input" v-on:change="toggleComplete">
            </div>
            <h2 class="task-name form-check-label" v-bind:class="{'task-name-completed':task.complete}">{{ task.name }}</h2>
            <a href="#" onclick="this.preventDefault()">
                <font-awesome-icon class="task-header-icon fa-2x" icon="angle-down" title="more"/>
            </a>
            <div class="task-header-text task-due-date">{{ task.target_completion_date }}</div>
<!--            <font-awesome-icon class="task-header-icon fa-2x" icon="calendar-day" title="due date" v-bind:class="{'display-none':(task.target_completion_date === null)}"/>-->

            <div class="task-description">{{ task.description }}</div>

            <div class="task-buttons">
                <button class="btn btn-sm btn-primary edit">Edit</button>
                <button class="btn btn-sm btn-info schedule">Schedule</button>
                <button class="btn btn-sm btn-info archive">Archive</button>
                <button @click="deleteTask" class="btn btn-sm btn-danger delete">Delete</button>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'Task',
        props: ['task'],
        methods: {
            toggleComplete() {
                this.task.complete = !this.task.complete;
                console.log(this.task.name + ' toggled');
            },
            deleteTask() {
                this.$emit('delete-task', this.task.id);
                console.log('delete-task emitted from Task');
            },
            log(message) {
                console.log(message);
            },
            taskItemOverdue() {
                //Todo: implement overdue indicator
                //return (now > target_completion_date)
            }
        }
    }
</script>

<style scoped>
    .task-name-completed {
        text-decoration: line-through;
    }

    .task-item-overdue {
        background-color: #f6993f;
    }

    .task-item-completed {
        background-color: lightgreen;
        color: grey;
    }



</style>
