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
    <li class="ListAddComponent list-group-item d-flex align-items-center">
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
    </li>
</template>