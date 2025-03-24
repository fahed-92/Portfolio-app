require('./bootstrap');

window.Echo.channel('visitor-count')
    .listen('VisitorCountUpdated', (e) => {
        console.log('Visitor count updated:', e.visitorCount);
        // You can update the view with the new visitor count here
        document.getElementById('visitor-count').innerText = e.visitorCount;
    });
