<template>
    <div class="task-buttons">
        <button class="btn btn-sm btn-primary edit">Edit</button>
        <button class="btn btn-sm btn-info schedule">Schedule</button>
        <button class="btn btn-sm btn-info archive">Archive</button>
        <button @click="$emit('delete-task',tclass="btn btn-sm btn-danger delete">Delete</button>
    </div>
</template>

<script>
    export default {
        name: 'TaskButtons'
    }
</script>
