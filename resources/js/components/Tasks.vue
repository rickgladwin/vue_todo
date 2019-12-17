<template>
    <div>
        <b-tabs content-class="mt-3">
            <b-tab title="Current" active>
                <div v-bind:key="task.id" v-for="task in tasks">
<!--                    <Task v-bind:task="task" @delete-task="deleteTask"/>-->
                    <Task v-bind:task="task" @delete-task="$emit('delete-task', task.id)"/>
                </div>
            </b-tab>
            <b-tab title="Archived">
<!--                <div v-bind:key="task.id" v-for="task in tasks">-->
<!--                    <Task v-bind:task="task" @delete-task="alert('detected')"/>-->
<!--                </div>-->
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
    import Task from "./Task";

    export default {
        name: 'Tasks',
        components: {
            Task,
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
        }
    }
</script>

