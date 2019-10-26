import axios from "axios";

export default {
    state:{
        userId: 0,
        turn: {
            id: 0,
            number: 0,
            state: "CLOSE",
            user_id: 0,
            sales_id: 0
        },
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