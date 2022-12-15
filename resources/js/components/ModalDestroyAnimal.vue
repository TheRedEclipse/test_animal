<template>
  <div v-if="animal" class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container">
        <div class="modal-header">
          <slot name="header">
            <button class="modal-default-button" @click="$emit('cancelDestroyAnimal')">
              <img src="/images/close.svg" />
            </button>
          </slot>
        </div>
        <div class="modal-body info">
          <slot name="body">
            <p>Питомец {{ animal.title }} умер? :(</p>
            <img :src="'/images/' + animal.animal_type.name + '.svg'">
            <p>Родился: {{ animal.born }}</p>
            <p>Тип: {{ animal.animal_type.title }}</p>
            <p>Коофицент роста: {{ animal.animal_type.growth_multiplier }}</p>
          </slot>
        </div>

        <div class="modal-footer info-btn">
          <slot name="footer">
            <button class="red" @click="$emit('destroyAnimal', animal)">Да</button>
            <button @click="$emit('cancelDestroyAnimal')">Нет</button>
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props: {
        animal: null
    }
}
</script>