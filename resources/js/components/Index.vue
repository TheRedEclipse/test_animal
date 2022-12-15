<template>
  <div>
    <div class="dropdown">
      <button class="dropbtn">
        <img class="dropbtnimg" src="/images/plus.svg" />
      </button>
      <div class="dropdown-content">
        <span v-for="(animalType, key) in animalTypes" :key="key">
          <button @click="addAnimal = animalType">
            <img :src="'/images/' + animalType.name + '.svg'" />
          </button>
        </span>
      </div>
    </div>
    <div class="animal-container">
      <div class="animal" v-for="(animal, key) in animals" :key="key" :style="'width:' + animal.size + '%'">
        <Animal :animal="animal" @getAnimalDetails="getAnimalDetails" />
      </div>
    </div>
    <ModalAddAnimal
      :animal="addAnimal"
      @newAnimal="postNewAnimal"
      @cancelAnimal="cancelAnimal"
    >
    </ModalAddAnimal>
    <ModalDestroyAnimal
      :animal="animalDetails"
      @destroyAnimal="destroyAnimal"
      @cancelDestroyAnimal="animalDetails = null"
    >
    </ModalDestroyAnimal>
  </div>
</template>
<script>
import Animal from "../components/Animal.vue";
import ModalAddAnimal from "../components/ModalAddAnimal.vue";
import ModalDestroyAnimal from "../components/ModalDestroyAnimal.vue";

export default {
  components: {
    Animal,
    ModalAddAnimal,
    ModalDestroyAnimal,
  },
  data() {
    return {
      animals: [],
      animalTypes: [],
      addAnimal: null,
      animalDetails: null,
    };
  },
  created() {
    this.getAnimals();
    this.getAnimalTypes();
  },
  methods: {
    getAnimals() {
      window.axios
        .get("/api/animals")
        .then((response) => {
          if (response.data.success === true) {
            this.animals = response.data.animals;
          }
        })
        .catch((error) => {
          this.$notify({
            type: "error",
            text: error.response.data.message,
          });
        });
    },
    getAnimalTypes() {
      window.axios
        .get("/api/animal-types")
        .then((response) => {
          if (response.data.success === true) {
            this.animalTypes = response.data.animal_types;
          }
        })
        .catch((error) => {
          this.$notify({
            type: "error",
            text: error.response.data.message,
          });
        });
    },
    postNewAnimal(animal) {
      axios
        .post("/api/animals", animal)
        .then((response) => {
          if (response.data.success === true) {
            this.addAnimal = null;

            this.getAnimals();

            this.$notify({
              type: "success",
              text: "Сохранено",
            });
          }
        })
        .catch((error) => {
          this.$notify({
            type: "error",
            text: error.response.data.message,
          });
        });
    },
    destroyAnimal(animal) {
      axios
        .delete(`/api/animals/${animal.id}`)
        .then((response) => {
          if (response.data.success === true) {

            this.getAnimals();

            this.$notify({
              type: "success",
              text: "Питомец удалён",
            });

            this.animalDetails = null;
          }
        })
        .catch((error) => {
          this.$notify({
            type: "error",
            text: error.response.data.message,
          });
        });
    },
    cancelAnimal() {
      this.addAnimal = null;
    },
    getAnimalDetails(animal) {
      this.animalDetails = animal;
    },
  },
};
</script>