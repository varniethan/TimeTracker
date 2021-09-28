const sio = io();
console.log("Hello!");

sio.on('connect', () => {
    console.log('connected');
    sio.emit('sum', {numbers: [1,2]})
    sio.emit('send_code')
});

sio.on('disconnect', () => {
    console.log('disconnected');
});

sio.on('sum_result', (data) => {
    console.log(data);
});

sio.on('code_result', (data) => {
    // console.log(data);
    document.getElementsByTagName("p")[0].innerHTML=data['result'];
});
