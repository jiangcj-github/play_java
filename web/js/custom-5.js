//canvas play
function CanvasPlay(id){
    this.id=id;
    this.video=$("<video/>").appendTo("body")[0];
    this.video.width=800;
    this.video.height=600;
    this.canvas=$("#"+id)[0];
    this.context=this.canvas.getContext("2d");
    //$(this.canvas).on("contextmenu",function(){return false;});
    video.src="mv/1.mp4";
    video.autoplay=true;

    this.init();
}

CanvasPlay.prototype.loadedmetadata=function(){};
CanvasPlay.prototype.timeUpdate=function(){};
CanvasPlay.prototype.abort=function(){};
CanvasPlay.prototype.canplay=function(){};
CanvasPlay.prototype.canplaythrough=function(){};
CanvasPlay.prototype.durationchange=function(){};
CanvasPlay.prototype.emptied=function(){};
CanvasPlay.prototype.ended=function(){};
CanvasPlay.prototype.error=function(){};
CanvasPlay.prototype.loadeddata=function(){};
CanvasPlay.prototype.loadstart=function(){};
CanvasPlay.prototype.pause=function(){};
CanvasPlay.prototype.play=function(){};
CanvasPlay.prototype.playing=function(){};
CanvasPlay.prototype.progress=function(){};
CanvasPlay.prototype.ratechange=function(){};
CanvasPlay.prototype.seeked=function(){};
CanvasPlay.prototype.seeking=function(){};
CanvasPlay.prototype.stalled=function(){};
CanvasPlay.prototype.suspend=function(){};
CanvasPlay.prototype.volumechange=function(){};
CanvasPlay.prototype.waiting=function(){};

CanvasPlay.prototype.init=function(){
    var _this=this;
    $(video).on("loadedmetadata", function() {
        _this.loadedmetadata();
    });
    $(video).on("timeupdate", function() {
        _this.timeUpdate();
    });
    $(video).on("abort", function() {
        _this.abort();
    });
    $(video).on("canplay", function() {
        window.RAF(_this.playVideo.bind(_this));
        _this.canplay();
    });
    $(video).on("canplaythrough", function() {
        _this.canplaythrough();
    });
    $(video).on("durationchange", function() {
        _this.durationchange();
    });
    $(video).on("emptied", function() {
        _this.emptied();
    });
    $(video).on("ended", function() {
        _this.ended();
    });
    $(video).on("error", function() {
        _this.error();
    });
    $(video).on("loadeddata", function() {
        _this.loadeddata();
    });
    $(video).on("loadstart", function() {
        _this.loadstart();
    });
    $(video).on("pause", function() {
        _this.pause();
    });
    $(video).on("play", function() {
        console.log("play");
        _this.play();
    });
    $(video).on("playing", function() {
        console.log("playing");
        _this.playing();
    });
    $(video).on("progress", function() {
        _this.progress();
    });
    $(video).on("ratechange", function() {
        _this.ratechange();
    });
    $(video).on("seeked", function() {
        _this.seeked();
    });
    $(video).on("seeking", function() {
        _this.seeking();
    });
    $(video).on("stalled", function() {
        _this.stalled();
    });
    $(video).on("suspend", function() {
        _this.suspend();
    });
    $(video).on("volumechange", function() {
        _this.volumechange();
    });
    $(video).on("waiting", function() {
        _this.waiting();
    });
};

//*********************************************************************************************************************
CanvasPlay.prototype.play=function(){
    this.video.play();
};

CanvasPlay.prototype.load=function(){
    this.video.load();
};

CanvasPlay.prototype.pause=function(){
    this.video.pause();
};

CanvasPlay.prototype.addTextTrack=function(kind,label,language){
    return this.video.addTextTrack(kind,label,language);
};

CanvasPlay.prototype.canPlayType=function(type){
    return this.video.canPlayType(type);
};

CanvasPlay.prototype.setCurrentTime=function(time){
    this.video.currentTime=time;
};

CanvasPlay.prototype.getCurrentTime=function (){
    return this.video.currentTime;
};

CanvasPlay.prototype.getAudioTracks=function(){
    return this.video.audioTracks;
};

CanvasPlay.prototype.setAutoplay=function(bool){
    this.video.autoplay=bool;
};

CanvasPlay.prototype.getAutoplay=function(){
    return this.video.autoplay;
};

CanvasPlay.prototype.getBuffered=function(){
    return this.video.buffered;
};

CanvasPlay.prototype.getController=function(){
    return this.video.controller;
};

CanvasPlay.prototype.getCrossOrigin=function(){
    return this.video.crossOrigin;
};

CanvasPlay.prototype.setCrossOrigin=function(str){
    this.video.crossOrigin=str;
};

CanvasPlay.prototype.getCurrentSrc=function(){
    return this.video.currentSrc;
};

CanvasPlay.prototype.getDefaultMuted=function(){
    return this.video.defaultMuted;
};

CanvasPlay.prototype.setDefaultMuted=function(bool){
    this.video.defaultMuted=bool;
};

CanvasPlay.prototype.getDefaultPlaybackRate=function(){
    return this.video.defaultPlaybackRate;
};

CanvasPlay.prototype.setDefaultPlaybackRate=function(rate){
    this.video.defaultPlaybackRate=rate;
};

CanvasPlay.prototype.getDuration=function(){
    return this.video.duration;
};

CanvasPlay.prototype.getEnded=function(){
    return this.video.ended;
};

CanvasPlay.prototype.getError=function(){
    return this.video.error;
};

CanvasPlay.prototype.getLoop=function(){
    return this.video.loop;
};

CanvasPlay.prototype.setLoop=function(bool){
    this.video.loop=bool;
};

CanvasPlay.prototype.getMediaGroup=function(){
    return this.video.mediaGroup;
};

CanvasPlay.prototype.setMediaGroup=function(str){
    this.video.mediaGroup=str;
};

CanvasPlay.prototype.getMuted=function(){
    return this.video.muted;
};

CanvasPlay.prototype.setMuted=function(bool){
    this.video.muted=bool;
};

CanvasPlay.prototype.getNetworkState=function(){
    return this.video.networkState;
};

CanvasPlay.prototype.setPaused=function(bool){
    this.video.paused=bool;
};

CanvasPlay.prototype.getPaused=function(){
    return this.video.paused;
};

CanvasPlay.prototype.getPlaybackRate=function(){
    return this.video.playbackRate;
};

CanvasPlay.prototype.setPlaybackRate=function(rate){
    this.video.playbackRate=rate;
};

CanvasPlay.prototype.getPlayed=function(){
    return this.video.played;
};

CanvasPlay.prototype.setPreload=function(bool){
    this.video.preload=bool;
};

CanvasPlay.prototype.getPreload=function(){
    return this.video.preload;
};

CanvasPlay.prototype.getReadyState=function(){
    return this.video.readyState;
};

CanvasPlay.prototype.getSeekable=function(){
    return this.video.seekable;
};

CanvasPlay.prototype.getSeeking=function(){
    return this.video.seeking;
};

CanvasPlay.prototype.setSrc=function(url){
    this.video.src=url;
};

CanvasPlay.prototype.getSrc=function(){
    return this.video.src;
};

CanvasPlay.prototype.getStartDate=function(){
    return this.video.startDate;
};

CanvasPlay.prototype.getTextTracks=function(){
    return this.video.textTracks;
};

CanvasPlay.prototype.getVideoTracks=function(){
    return this.video.videoTracks;
};

CanvasPlay.prototype.getVolume=function(){
    return this.video.volume;
};

CanvasPlay.prototype.setVolume=function(volumn){
    this.video.volume=volumn;
};

//*********************************************************************************************************************

window.RAF = (function(){
    //return window.requestAnimationFrame||
        //window.webkitRequestAnimationFrame||
        //window.mozRequestAnimationFrame||
        //window.msRequestAnimationFrame||
     return   function(callback){
            window.setTimeout(function(){
                callback();
            },1000 / 60);
        };
})();

CanvasPlay.prototype.playVideo=function() {
    //if(this.video.ended || this.video.paused) return;
    this.context.drawImage(this.video, 0, 0, this.video.width, this.video.height,0,0,this.canvas.width,this.canvas.height);
    console.log(this.video.width+"-"+this.canvas.width);
    window.RAF(this.playVideo.bind(this));
};


