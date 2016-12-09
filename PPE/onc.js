
 
 	function changeCompte() 
{ 	if (document.forms['compt'].modif2.type=="button")
			{
				//Js Nouveau MAIL
				if (document.forms['compt'].newmail.type=="button") 
				{document.forms['compt'].newmail.type="text";} 

				else 
				{document.forms['compt'].newmail.type="button";} 

				//Js Nouveau PASSWORD
			
				if (document.forms['compt'].newpassword.type=="button") 
				{document.forms['compt'].newpassword.type="text";} 

				else 
				{document.forms['compt'].newpassword.type="password";} 


			}


	
}	

	function compte()
{ if (document.forms['CCompte'].modif.type=="button")
		{
			//Js Nouveau NOM
				if (document.forms['CCompte'].newnom.type=="button") 
				{document.forms['CCompte'].newnom.type="text";} 

				else 
				{document.forms['CCompte'].newnom.type="button";}

			//Js Nouveau PRENOM
				if (document.forms['CCompte'].newprenom.type=="button") 
				{document.forms['CCompte'].newprenom.type="text";} 

				else 
				{document.forms['CCompte'].newprenom.type="button";}  
			
			//Js Nouveau COMPETENCES
				if (document.forms['CCompte'].newcompetences.type=="button") 
				{document.forms['CCompte'].newcompetences.type="text";} 

				else 
				{document.forms['CCompte'].newcompetences.type="button";}
			
			//Js Nouveau SITE
				if (document.forms['CCompte'].newsite.type=="button") 
				{document.forms['CCompte'].newsite.type="text";} 

				else 
				{document.forms['CCompte'].newsite.type="button";}

			//Js Nouveau TARIF
				if (document.forms['CCompte'].newtarif.type=="button") 
				{document.forms['CCompte'].newtarif.type="text";} 

				else 
				{document.forms['CCompte'].newtarif.type="button";}

			//Js Nouveau LANGUES
				if (document.forms['CCompte'].newlangues.type=="button") 
				{document.forms['CCompte'].newlangues.type="text";} 

				else 
				{document.forms['CCompte'].newlangues.type="button";}

			//Js Nouveau LOCALISATION
				if (document.forms['CCompte'].newlocalisation.type=="button") 
				{document.forms['CCompte'].newlocalisation.type="text";} 

				else 
				{document.forms['CCompte'].newlocalisation.type="button";}

		}
	}