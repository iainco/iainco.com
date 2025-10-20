<script setup lang="ts">
interface Props {
    name: string
    bgColor: string
    hoverBgColor: string
}

const props = defineProps<Props>()
</script>

<template>
    <span :class="`inline-flex gap-1 items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold text-white transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent  ${props.bgColor} ${props.hoverBgColor}`">
        {{ props.name }}
    </span>
</template>
