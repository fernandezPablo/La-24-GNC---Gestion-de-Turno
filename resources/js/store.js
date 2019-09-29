import axios from "axios";

export default {
    state:{
        userId: 0,
        turnId: 0,
    },
    mutations: {
        setUserId(state,id){
            state.userId = id;
        },
        async setTurnId(state,id){
            state.turnId = id;
        }
    },
    getters: {
        getUserId(state){
            return state.userId;
        },
        getTurnId(state){
            return state.turnId
        }
    },
    actions: {}
};