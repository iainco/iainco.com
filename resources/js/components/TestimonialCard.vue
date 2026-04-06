<script setup lang="ts">
import { CircleUserRoundIcon, Star } from 'lucide-vue-next'

interface Props {
    iconClasses: Array<string>
    clientName: string
    projectName: string
    bodyText: string
}

const props = defineProps<Props>()
</script>

<template>
    <div class="h-full p-5 sm:p-6 lg:p-8 bg-white rounded-4xl border-4 border-gray-200 flex flex-col">
        <div class="mb-4 flex items-center justify-between sm:block">
            <div class="mb-0 sm:mb-4 flex items-center">
                <div
                    class="mr-4 size-12 rounded-full bg-gradient-to-br text-white flex items-center justify-center"
                    :class="iconClasses"
                >
                    <CircleUserRoundIcon :size="24"/>
                </div>

                <div>
                    <h4 class="font-bold text-gray-800">{{ props.clientName }}</h4>
                    <p class="text-sm text-gray-600">{{ props.projectName }}</p>
                </div>
            </div>

            <div class="mb-4 flex">
                <Star class="fill-yellow-300 text-yellow-300"/>
                <Star class="fill-yellow-300 text-yellow-300"/>
                <Star class="fill-yellow-300 text-yellow-300"/>
                <Star class="fill-yellow-300 text-yellow-300"/>
                <Star class="fill-yellow-300 text-yellow-300"/>
            </div>
        </div>

        <p class="text-sm text-gray-700 flex-1">{{ props.bodyText }}</p>
    </div>
</template>
