<script setup lang="ts">
interface Props {
    icon: any
    iconClasses: Array<string>
    name: string
    description: string
    url?: string
}

const props = defineProps<Props>()
</script>

<template>
    <div class="p-4 lg:p-8 bg-white rounded-none sm:rounded-4xl border-t-4 border-b-0 last:border-b-4 sm:border-4 shadow-2xl sm:transition-transform sm:hover:scale-105">
        <div class="mb-4 flex items-center">
            <div class="mr-4 size-12 rounded-full bg-gradient-to-br text-white flex items-center justify-center" :class="iconClasses">
                <component :is="icon" :size="24"  />
            </div>

            <div>
                <h4 class="font-bold text-gray-800">
                    {{ props.name }}
                </h4>

                <p class="text-sm text-gray-600">
                    <a v-if="url" class="text-blue-500" target="_blank" :href="props.url">{{ props.url }}</a>
                    <span v-else>Coming soon</span>
                </p>
            </div>
        </div>

        <p class="mb-8 text-sm text-gray-700">
            {{ props.description }}
        </p>

        <div class="flex flex-wrap gap-1">
            <slot name="tech-tags"></slot>
        </div>
    </div>
</template>
