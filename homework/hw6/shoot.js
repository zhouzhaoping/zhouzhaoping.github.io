// ---- Make array
 function MakeArray( n)
 { 
	 this.length = n;
     for (var i = 1; i <= n; i++) 
	 {
         this[i] = 0;
     }
     return this;
 }
 
 // ----- poor man's random number
 var d0 = new Date();
 var r0 = d0.getSeconds();
 function poor_rand()
 {
 /*
     d1 = new Date();
     r0 = (r0 * r0 + r0 + d1.getSeconds()) % 3721 ;
     return r0 % width_n;
 */
	return Math.floor(Math.random() * width_n);
 }
 
 // ---- Parameters of game
 var height_n = 8;
 var width_n =5;
 function setPara(h, w)
 {
	height_n = h;
	width_n = w;
 }
 
 // ---- state of game
 var enemy = new MakeArray( width_n); // enemy positions
 var wtime; // wait time
 var score; // points
 var gameover; // in case of gameover set to true
 
 // ----- Make the battlefield.
 function makeBattlefield()
 {
	 document.write( "<form name = 'fm1'>");
	 document.write( "<input type = 'text' name = 'message' SIZE=20>");
	 document.write( "</form>");
	 document.write( "<form name = 'fm2'><table>");
	 for( var i=0; i<height_n; i++){
		 document.write( "<tr>");
		 for( var j=0;j<width_n; j++){
			 document.write( "<td><center><input type = 'radio'></center></td>");
		 }
		 document.write( "</tr>");
	 }
	 document.write( "<tr>");
	 for( var j=0;j<width_n; j++){
		 document.write( "<td><input type = 'button' value = 'S' onClick='fire("
			 + j + ")'></td>");
	 }
	 document.write( "</tr>");
	 document.write( "</table>");
	 document.write( "<input type = 'button' value = 'START' onClick='game_start()'>");
	 document.write( "</form>");
 }
 // ----- game main timer event
 // -----     enemy come one step
 function come(){
     var n = poor_rand();
     document.fm2.elements[ width_n * enemy[n+1] + n].checked = true;
     enemy[n+1]++;
     if( enemy[n+1] < height_n){
         setTimeout("come()", wtime);
     }else{
       gameover = true;
       document.fm1.message.value =  "GAME OVER:" + score ;// 结束输出
     }
 }
 
 // ----- Fire the n th beam
 function fire( n){
     if( gameover ) return;
     for( var i=0; i<enemy[n+1]; i++){ // clear enemy
         document.fm2.elements[ width_n * i + n].checked = false;
     }
     score += enemy[ n+1];
     document.fm1.message.value = "Points:" + score;
     enemy[ n+1] = 0;
     if( wtime > 50){ wtime -= 10};
 }
 
 // ---- initialize & start game
 function game_start(){
    for( var n=0; n<width_n; n++){
         for( var i=0; i<enemy[n+1]; i++){
             document.fm2.elements[ width_n * i + n].checked = false;
         }
         enemy[n+1] = 0;
     }
     wtime = 150;
     score = 0;
     gameover = false;
     document.fm1.message.value = "Points:" + score;
     setTimeout("come()", wtime);
 }