

export async function addProductToCart(url,data){
        const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    const url = "https://example.org/products.json";
    try {
      const response = await fetch(url,{
        method:'POST',
        headers: {
            "Content-Type": "application/json",

        },
        data : JSON.stringify( {"id":data})
      });
      if (!response.ok) {
        throw new Error(`Erreur dans l appel du serveur: ${response.status}`);
      }
  
      const json = await response.json();
      console.log(json);
    } catch (error) {
      console.error(error.message);
    }
}


export async function getAllPrdocut() {
    
    const response=fetch('http://127.0.0.1:8000/client/produitAll')
    if(!response.ok){
        throw new Error(`Erreur dans l appel du serveur: ${response.status}`);

    }
    data= await response.json()

    return data;
}


