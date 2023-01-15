<script>
export default {
    name: "ListAdd",
    emits: ['task-add'],
    data() {
        return {
            taskTitle: "",
            taskDescription: "",
        }
    }
}
</script>

<template>
    <div class="ListAddComponent">
        <form class="list-group-item d-flex align-items-center" onsubmit="return false">
            <div class="form-group mr-3">
                <input type="text" v-model="taskTitle" class="form-control" placeholder="Task Title">
            </div>
            <div class="form-group mr-3">
                <input type="text" v-model="taskDescription" class="form-control" placeholder="Task Description">
            </div>
            <div class="ml-auto">
                <button @click="$emit('task-add', undefined, { title: taskTitle, desc: taskDescription, check: false })"
                    class="btn btn-primary btn-sm rounded-button">Add Task</button>
            </div>
        </form>
    </div>
</template>

<style scoped lang="scss">
.list-group-item {
    background-color: #282828;
    color: #f8f8f8;
    border-radius: 10px;
    padding: 10px 20px;
    border: none;
    margin-bottom: 10px;
}
</style>