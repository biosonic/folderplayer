/**
 * ownCloud - folderplayer
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Aleksandar Veljkovic <coa.develop@gmail.com>
 * @copyright Aleksandar Veljkovic 2016
 */

(function ($, OC) {

$(function () {

    var template = '\
    <div id="jp_container_folder-player" class="jp-audio " role="application" aria-label="media player">\
      <div class="players-top-bar"><span class="title">FP</span><a href="#" class="minimize">_</a><a href="#" class="close">x</a></div>\
      <div class="jp-type-playlist">\
        <div id="jquery_jplayer_folder-player" class="jp-jplayer"></div>\
        <div class="jp-gui jp-interface">\
          <div class="jp-volume-controls">\
            <button class="jp-mute" role="button" tabindex="0">mute</button>\
            <button class="jp-volume-max" role="button" tabindex="0">max volume</button>\
            <div class="jp-volume-bar">\
              <div class="jp-volume-bar-value"></div>\
            </div>\
          </div>\
          <div class="jp-controls-holder">\
            <div class="jp-controls">\
              <button class="jp-previous" role="button" tabindex="0">previous</button>\
              <button class="jp-play" role="button" tabindex="0">play</button>\
              <button class="jp-stop" role="button" tabindex="0">stop</button>\
              <button class="jp-next" role="button" tabindex="0">next</button>\
            </div>\
            <div class="jp-progress">\
              <div class="jp-seek-bar">\
                <div class="jp-play-bar"></div>\
              </div>\
            </div>\
            <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>\
            <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>\
            <div class="jp-toggles">\
              <button class="jp-repeat" role="button" tabindex="0">repeat</button>\
            </div>\
          </div>\
        </div>\
        <div class="jp-details">\
          <div class="jp-title" aria-label="title">&nbsp;</div>\
        </div>\
        <div class="jp-no-solution">\
          <span>Update Required</span>\
          To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.\
        </div>\
        <div class="jp-playlist">\
          <ul>\
            <li></li> <!-- Empty <li> so your HTML conforms with the W3C spec -->\
          </ul>\
        </div>\
      </div>\
    </div>\
  ';

  var playerInit = function(songs){



            var playlist = new jPlayerPlaylist(
                    {
                      jPlayer: "#jquery_jplayer_folder-player",
                      cssSelectorAncestor: "#jp_container_folder-player"
                    },
                    songs,
                    {
                      playlistOptions: {
                        enableRemoveControls: true,
                        autoPlay: true
                      },
                      swfPath: "/js",
                      supplied: "mp3",
                      smoothPlayBar: true,
                      keyEnabled: false,
                      useStateClassSkin: true,
                      audioFullScreen: false // Allows the audio poster to go full screen via keyboard
                    }
            );
  }


  var init = function(url){

        if (!$("#jquery_jplayer_folder-player").length) {
          $('#header').append($(template));
          $('#jp_container_folder-player .minimize').click(function(e){
            $('#jp_container_folder-player').toggleClass('minimal')
            e.preventDefault();
          });
          $('#jp_container_folder-player .close').click(function(e){
            e.preventDefault();
            $("#jquery_jplayer_folder-player").jPlayer('destroy');
            $('#jp_container_folder-player').remove();
          });
        }
        $("#jquery_jplayer_folder-player").jPlayer('destroy');

        $.ajax({
        url: oc_webroot + "/remote.php/webdav" + url,
        method: "PROPFIND",
        headers: {
          "X-Requested-With": "cUrl",
          "Depth": "infinity"
        },
        contentType: "application/xml; charset=utf-8",
        success: function (response) {
          var songs = [];
          $(response).find("response").find("href").each(function (i, o) {
            var src = o.innerHTML;
            var ext = src.split('.').pop();
            if (ext === "mp3") {
              var regE = new RegExp("^" + oc_webroot.replace('/', '\/') + "\/remote.php\/webdav\/(.*)\/(.*)." + ext + "$", 'i');
              var regM = src.match(regE);
              songs.push({
                mp3: src,
                artist: decodeURIComponent(regM[1]),
                title: decodeURIComponent(regM[2])
              });
            }
          });

          playerInit(songs);


        }


      });
  }


  try {
    OCA.Files.fileActions.register('all', 'Play', OC.PERMISSION_READ, OC.imagePath('core', 'actions/play'), function (fileName, fileObject) {
      var path = fileObject.dir+"/"+fileName;
      init(path);
    });
  }
  catch (e) {
  }




});

})(jQuery, OC);
