<script setup lang="ts">
interface Props {
    grow?: boolean
}

withDefaults(defineProps<Props>(), {
    grow: false,
})
</script>

<template>
    <section
        class="flex min-h-screen flex-col justify-center"
        :class="grow ? 'py-24 sm:py-28' : 'h-screen'"
    >
        <div class="px-0 sm:px-6 md:px-8 lg:px-10 xl:px-12">
            <slot></slot>
        </div>
    </section>
</template>
