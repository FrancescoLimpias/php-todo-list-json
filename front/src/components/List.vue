<script>
import { store } from '../store.js';

export default{
    data(){
        return {
            store,
        }
    }
}
</script>

<template>
    <div class="ListComponent">
        <ul>
            <li v-for="task in store.list">
                <input type="text" name="" id="" :value="task.title">
                <span class="desc">
                    {{ task.desc }}
                </span>
            </li>
        </ul>
    </div>
</template>