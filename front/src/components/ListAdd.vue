<script>
export default {
    name: "ListAdd",
    emits: ['task-add'],
    data(){
        return{
            taskTitle: "",
        }
    }
}
</script>

<template>
    <div class="ListAddComponent">
        <form onsubmit="return false">
            <input type="text" name="" id="" v-model="taskTitle" placeholder="add task...">
            <button type="submit" @click="$emit('task-add', undefined, {title: taskTitle, check: false})">Add</button>
        </form>
    </div>
</template>