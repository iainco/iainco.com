<script setup lang="ts">
interface Props {
    name: string
}

const props = defineProps<Props>()
</script>

<template>
    <div class="group relative max-w-min bg-white rounded-2xl p-4 shadow-xl hover:scale-110 transition-transform">
        <svg class="size-6 sm:size-7 md:size-8 lg:size-9 xl:size-10" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
            <slot></slot>
        </svg>

        <span class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-white font-semibold">
            {{ props.name }}
        </span>
    </div>
</template>
