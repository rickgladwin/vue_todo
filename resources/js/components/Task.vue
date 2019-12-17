<template>
    <div>
        <div class="task-item" v-bind:class="{'task-item-completed':task.complete}">
            <div class="task-title-block">
                <div class="task-completed-marker form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" v-bind:checked="task.complete" v-on:change="toggleComplete">
                    <h2 class="task-name form-check-label" v-bind:class="{'task-name-completed':task.complete}">{{ task.name }}</h2>
                </div>
            </div>

<!--            <a href="#" class="task-more-chevron-link" onclick="this.classList.toggle('task-more-chevron-rotated'); return false">-->
<!--                <font-awesome-icon class="task-header-icon fa-2x" icon="angle-down" title="more"/>-->
<!--            </a>-->

<!--            <div class="task-header-text task-due-date">{{ task.target_completion_date }}</div>-->
<!--            <font-awesome-icon class="task-header-icon fa-2x" icon="calendar-day" title="due date" v-bind:class="{'display-none':(task.target_completion_date === null)}"/>-->

<!--            <div class="task-description">{{ task.description }}</div>-->

            <div class="task-buttons">
                <div v-if="task.target_completion_date === null" style="visibility: hidden" class="task-header-text task-due-date">0000-00-00</div>
                <div v-if="task.target_completion_date !== null" class="task-header-text task-due-date">{{ task.target_completion_date }}</div>
<!--                <font-awesome-icon class="task-header-icon fa-controls" icon="calendar-alt" title="Schedule"/>-->
<!--                <button class="btn btn-sm btn-info schedule">Schedule</button>-->
                <font-awesome-icon class="task-header-icon fa-controls" icon="edit" title="Edit" @click="toggleTaskEditForm"/>
                <EditTask v-bind:task="task" @edit-task="$emit('edit-task', task)"/>
<!--                <button class="btn btn-sm btn-primary edit">Edit</button>-->
                <font-awesome-icon @click="archiveTask" v-if="task.status_name === 'current'" class="task-header-icon fa-controls" icon="archive" title="Archive"/>
<!--                <button @click="archiveTask" v-if="task.status_name === 'current'" class="btn btn-sm btn-primary archive">Archive</button>-->
                <font-awesome-icon @click="unArchiveTask" v-if="task.status_name === 'archived'" class="task-header-icon fa-controls" icon="box-open" title="Un-Archive"/>
<!--                <button @click="unArchiveTask" v-if="task.status_name === 'archived'" class="btn btn-sm btn-primary archive">Un-Archive</button>-->
                <font-awesome-icon @click="deleteTask" class="task-header-icon fa-controls" icon="trash" title="Delete"/>
<!--                <button @click="deleteTask" class="btn btn-sm btn-danger delete">Delete</button>-->
            </div>



        </div>
    </div>
</template>

<script>

    import EditTask from './EditTask';

    export default {
        name: 'Task',
        props: ['task'],
        components: {
            EditTask
        },
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
            toggleTaskEditForm() {
                //identify all edit forms
                const task_edit_forms = document.getElementsByClassName('task-edit-form');

                //hide all edit forms
                for (let i = 0; i < task_edit_forms.length; i++) {
                    task_edit_forms[i].style.display = 'none';
                }

                //identify target form
                const target_edit_form = document.getElementById('edit_form_' + this.task.id);
                //toggle target form display
                if (target_edit_form.style.display === 'none') {
                    target_edit_form.style.display = 'inline-block';
                } else {
                    target_edit_form.style.display = 'none';
                }
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
        display: flex;
        padding: 15px;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
    }

    .task-title-block {
        margin-right: 30px;
        padding: 0.6em 0.25em;
    }

    .task-buttons {
        /*display: inline-block;*/
        display: flex;
        justify-content: flex-end;
        align-items: center;
        align-self: flex-end;
        position: relative;
    }

    .task-name {
        display: inline-block;
    }

    .task-header-icon {
        /*float: right;*/
        cursor: pointer;
    }

    .task-header-text {
        /*float: right;*/
        padding: 0 0.25em;
        display: inline-block;
        font-size: 0.7875rem;
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

    .fa-controls {
        font-size: 1.5em;
    }
</style>
