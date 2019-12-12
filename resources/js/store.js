import axios from "axios";

export default {
    state:{
        userId: 0,
        turn: {
            id: 0,
            number: 0,
            state: "CLOSE",
            date: "00/00/0000",
            user_id: 0,
            sales_id: 0
        },
    },
    mutations: {
        setUserId(state,id){
            state.userId = id;
        },
        setTurn(state,turn){
            state.turn.id = turn.id
            state.turn.number = turn.number
            state.turn.state = turn.state
            state.turn.date = turn.date
            state.turn.user_id = turn.user_id
            state.turn.sales_id = turn.sales_id
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