<template>
    <div>
        
        <div>
            <b-tabs content-class="mt-3">
                <b-tab title="Current" active>
                    <div v-bind:key="task.id" v-for="task in tasks">
                        <Task v-bind:task="task"/>
                    </div>
                </b-tab>
                <b-tab title="Archived">
                    <div v-bind:key="task.id" v-for="task in tasks">
                        <Task v-bind:task="task"/>
                    </div>
                </b-tab>
            </b-tabs>
        </div>

    </div>


</template>

<script>
    import Task from './Task.vue';
    import { mdbContainer, mdbCol, mdbRow, mdbIcon, mdbTabs } from 'mdbvue';

    export default {
        name: 'Tasks',
        components: {
            Task,
            mdbContainer,
            mdbCol,
            mdbRow,
            mdbIcon,
            mdbTabs
        },
        props: ['tasks']
    }
</script>

