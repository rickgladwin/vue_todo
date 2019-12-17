<template>
    <div>
        <div class="task-item" v-bind:class="{'task-item-completed':task.complete}">
            <div class="task-completed-marker form-check form-check-inline">
                <input type="checkbox" v-bind:checked="task.complete" class="form-check-input" v-on:change="toggleComplete">
            </div>
            <h2 class="task-name form-check-label" v-bind:class="{'task-name-completed':task.complete}">{{ task.name }}</h2>
            <a href="#" class="task-more-chevron-link" onclick="this.classList.toggle('task-more-chevron-rotated'); return false">
                <font-awesome-icon class="task-header-icon fa-2x" icon="angle-down" title="more"/>
            </a>
            <div class="task-header-text task-due-date">{{ task.target_completion_date }}</div>
<!--            <font-awesome-icon class="task-header-icon fa-2x" icon="calendar-day" title="due date" v-bind:class="{'display-none':(task.target_completion_date === null)}"/>-->

            <div class="task-description">{{ task.description }}</div>

            <div class="task-buttons">
                <button class="btn btn-sm btn-primary edit">Edit</button>
                <button class="btn btn-sm btn-info schedule">Schedule</button>
                <button @click="archiveTask" v-if="task.status_name === 'current'" class="btn btn-sm btn-info archive">Archive</button>
                <button @click="unArchiveTask" v-if="task.status_name === 'archived'" class="btn btn-sm btn-info archive">Un-Archive</button>
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
                this.$emit('toggle-complete', this.task);
                console.log(this.task.name + ' toggled to ' + this.task.complete);
            },
            deleteTask() {
                this.$emit('delete-task', this.task.id);
                console.log('delete-task emitted from Task');
            },
            archiveTask() {
                this.task.status_id = 2;
                this.task.status_name = 'archived';
                this.$emit('toggle-status', this.task);
            },
            unArchiveTask() {
                this.task.status_id = 1;
                this.task.status_name = 'current';
                this.$emit('toggle-status', this.task);
            },
            toggleTaskDetails(event) {
                event.preventDefault();
                event.target.classList.toggle('task-more-chevron-rotated');
                console.log('click target', event.target);
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
    .task-item {
        padding: 15px;
    }

    .task-name {
        display: inline-block;
    }

    .task-header-icon {
        float: right;
    }

    .task-header-text {
        float: right;
        padding: 0.6em 0.25em;
    }

    .task-header-icon {
        margin: 5px;
    }

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

    .task-more-chevron-link {
        position: relative;
        /*background-color: pink;*/
        display: inline-block;
        float: right;
        padding: 0 0.5em;
    }

    .task-more-chevron-link {
        transition-property: transform;
        transform-origin: center center;
        transform: rotate(0);
        position: relative;
    }

    .task-more-chevron-rotated {
        transform: rotate(180deg);
        position: relative;
    }
</style>
