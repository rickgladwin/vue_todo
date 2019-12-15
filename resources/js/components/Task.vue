<template>
    <div>
        <div class="task-item">
            <div class="task-name">{{ task.name }}</div>
            <div class="task-description">{{ task.description }}</div>
            <TaskButtons/>
        </div>
    </div>
</template>

<script>
    import TaskButtons from './TaskButtons';

    export default {
        name: 'Task',
        components: {
            TaskButtons
        },
        props: ['task']
    }
</script>
