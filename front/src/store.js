import { reactive } from "vue";

export const store = reactive({
    list: {
        0: {
            title: "Loading your list ;)",
            desc: "thank you for waiting...",
            check: false,
        }
    },
});