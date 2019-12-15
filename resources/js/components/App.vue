<template>
    <div id="app">
        <div class="row">
            <div class="col-xs-12">
                <Search/>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <Tasks v-bind:tasks="tasks"/>
            </div>
        </div>
    </div>
</template>

<script>

    import Search from "./Search";
    import Tasks from "./Tasks";

    export default {
        name: 'app',
        components: {
            Search,
            Tasks
        },
        data() {
            return {
                tasks: [
                    {
                        "id": 1,
                        "name": "Repellendus.",
                        "description": "Non ut facere aspernatur qui blanditiis voluptas. Modi nihil et optio.",
                        "complete": false,
                        "target_completion_date": "2020-03-29",
                        "status_id": 1,
                        "status_name": "current"
                    },
                    {
                        "id": 2,
                        "name": "Sint voluptate qui.",
                        "description": "Et aliquid quod provident asperiores. Quaerat impedit praesentium ut.",
                        "complete": false,
                        "target_completion_date": "2020-08-31",
                        "status_id": 2,
                        "status_name": "archived"
                    },
                    {
                        "id": 3,
                        "name": "Vitae ut qui dolor.",
                        "description": "Et dolore ullam pariatur et ut laudantium. Ea veniam consequatur qui ullam non sint incidunt.",
                        "complete": false,
                        "target_completion_date": "2020-07-23",
                        "status_id": 2,
                        "status_name": "archived"
                    }
                ]
            }
        }
    }
</script>
