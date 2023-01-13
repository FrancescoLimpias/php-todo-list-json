<script>
import { store } from '../store.js';

export default{
    data(){
        return {
            store,
        }
    },

    emits: ['task-updated'],
}

</script>

<template>
    <div class="ListComponent">
        <ul>
            <li v-for="(task, key) in store.list">
                <input type="text" name="" id="" :value="task.title" @blur="$emit('task-updated', key)" >
                <span class="desc">
                    {{ task.desc }}
                </span>
            </li>
        </ul>
    </div>
</template>