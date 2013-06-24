// made by Sergey Sobolevsky, 2013. 
// Not tested & probably incompatible with IE lt 9(jQuery compatibility omitted in favor of performance...)
(function(){
	window.onload = function(){
		var options = document.querySelectorAll('#currates .curcode'),
				select = document.querySelector('#selectcur'),
					option = undefined, 
						cursum = document.querySelector( '#sumbox' ),
							label = document.querySelector( '#cursum' )
								startLabel = label.textContent.trim(),
									table = document.querySelector('#currates');


		function change(){
			var that = this;

			if( this.tagName == 'TD' ){
				var i = 0;
				[].forEach.call( options, function(el){
					i++;
					if(that.textContent.trim() == el.textContent.trim()){
						select.selectedIndex = i-1;
					}
				})
			}

			if( cursum.value > 0 && cursum.value != '' && select.options[ select.selectedIndex ].value != '' ){
				var rate = parseFloat(document.querySelector( '#'+select.options[ select.selectedIndex ].textContent )
										.textContent);
				label.innerHTML = ( parseFloat( document.querySelector('#sumbox').value) * rate ).toFixed(2) + " ש''ח ";
			}
			else
				label.innerHTML = startLabel;
		}

		function colors(row){ 
			parseFloat(row.textContent) != '' && row.textContent.indexOf('-') > -1 ? 
							row.style.color = 'red' : parseFloat(row.textContent) > 0 ? 
									row.style.color = 'green' : 0;
		}

		(function init(){

			[].forEach.call( table.querySelectorAll('.curchange'), function(s){colors(s)} );

			[].forEach.call(options,function( el ){
				option = document.createElement( 'option' );
				if( el.children[0].textContent.trim() != '' )
					{
						option.value = el.children[0].textContent.trim();
						option.innerHTML = option.value;
						selectcur.appendChild( option );
						el.addEventListener( 'mouseover', change, false );
					}
			});
			select.addEventListener( 'change', change, false );
			cursum.addEventListener( 'input', change, false );
			
		})();
	}
}());