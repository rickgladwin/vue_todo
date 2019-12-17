<template>
    <div>
        <form class="form-inline header-form">
            <div class="row align-items-start">
                <div class="col-xs-12 col-sm-6">
                    <input type="text" v-model="search_date" name="search_date" placeholder="YYYY-MM-DD" class="form-control header-text-field">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <input type="button" v-on:click="filterDueDates" value="Search" class="btn btn-info todo-header-button">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <input type="button" v-on:click="clearFilter" value="Clear Search" class="btn btn-info todo-header-button">
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    export default {
        name:'Search',
        data() {
            return {
                search_date: ''
            }
        },
        methods: {
            filterDueDates() {
                //get target date from form
                const search_date = this.search_date;
                //if search string is not null
                if (search_date !== "") {
                    //send target date to main
                    this.$emit('filter-dates', search_date);
                }
            },
            clearFilter() {
                this.$emit('clear-filter');
            }
        }
    }
</script>
