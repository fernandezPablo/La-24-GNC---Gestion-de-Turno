import axios from "axios";

export default {
    state:{
        userId: 0,
        turn: {},
    },
    mutations: {
        setUserId(state,id){
            state.userId = id;
        },
        setTurn(state,turn){
            state.turn = turn;
        }
    },
    getters: {
        getUserId(state){
            return state.userId;
        },
        getTurn(state){
            return state.turn
        }
    },
    actions: {}
};