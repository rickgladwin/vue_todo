<template>
    <div style="width:100%; display: inline-block">
        <b-tabs content-class="mt-3">
            <b-tab title="Current" active>
                <div v-bind:key="task.id" v-for="task in currentTasks">
<!--                <div v-bind:key="task.id" v-for="task in tasks">-->
                    <Task v-bind:task="task"
                          @delete-task="$emit('delete-task', task.id)"
                          @toggle-complete="$emit('toggle-complete', task)"
                          @toggle-status="$emit('toggle-status', task)"
                          @edit-task="$emit('edit-task', task)"
                    />
                </div>
            </b-tab>
            <b-tab title="Archived">
                <div v-bind:key="task.id" v-for="task in archivedTasks">
                    <!--                <div v-bind:key="task.id" v-for="task in tasks">-->
                    <Task v-bind:task="task"
                          @delete-task="$emit('delete-task', task.id)"
                          @toggle-complete="$emit('toggle-complete', task)"
                          @toggle-status="$emit('toggle-status', task)"
                          @edit-task="$emit('edit-task', task)"
                    />
                </div>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
    import Task from "./Task";

    export default {
        name: 'Tasks',
        components: {
            Task
        },
        props: ['tasks'],
        methods: {
            deleteTask() {
                this.$emit('delete-task', this.task.id);
                console.log('delete-task emitted from Tasks!');
            },
            log(message) {
                console.log(message);
            }
        },
        computed: {
            currentTasks: function() {
                return this.tasks.filter( function(task) {
                    return task.status_name === 'current';
                })
            },
            archivedTasks: function() {
                return this.tasks.filter( function(task) {
                    return task.status_name === 'archived';
                })
            }
        }
    }
</script>

