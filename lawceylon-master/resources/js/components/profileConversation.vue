<template>
    <div class="profile-conversation">
        <h1>{{contact ? contact.firstname + ' '+ contact.secondname : 'select a contact'}}</h1>
        <profileMessagesFeed :contact="contact" :messages='messages'/>
        <profileMessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
import profileMessageComposer from './profileMessageComposer';
import profileMessagesFeed from './profileMessagesFeed'; 
export default {
    props:{
        contact:{
            type: Object,
            default: null
        },
        messages:{
            type: Array,
            default: []
        }
        
    },
    methods:{
        sendMessage(text){
            if(!this.contact){
                return;
            }
            axios.post('/conversation/profilesend',{
                contact_id : this.contact.id,
                text: text
            }).then((response)=>{
                this.$emit('newmessage', response.data);
            })
        }
    },
    components:{profileMessageComposer, profileMessagesFeed}  
}
</script>

<style lang="scss" scoped>
    .profile-conversation{
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1{
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray; 
        }
    }
</style>


