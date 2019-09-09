export default {
    state:{
        userId: 0,
        tuarnId: 0,
    },
    mutations: {
        setUserId(state,id){
            state.userId = id;
        },
        setTurnId(state,id){
            state.turnId = id
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