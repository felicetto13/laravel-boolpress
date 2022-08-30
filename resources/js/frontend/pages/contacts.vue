<template>
    <div>
        <form @submit.prevent="onsubmit" class="form-group" >
        <div class="input-group">
            <label for="title">Titolo</label>
            <input type="text" id="title" placeholder="titolo" v-model="title">
        </div>
        <div class="input-group">
            <label for="text">Titolo</label>
            <textarea id="text" placeholder="titolo" rows="12" cols="5" v-model="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            title:"",
            text:""
        }
    },
    methods:{
        onsubmit(){
            axios.get("api/contacts",{
                title: this.title,
                text: this.text
            })
        }
    }

}
</script>