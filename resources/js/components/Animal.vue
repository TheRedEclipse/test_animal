<template>
    <div @click="$emit('getAnimalDetails', animal)">
             <img :src="'/images/' + animal.animal_type.name + '.svg'" >
    </div>
</template>
<script>
export default {
    props: {
        animal: null
    } 
}
</script>