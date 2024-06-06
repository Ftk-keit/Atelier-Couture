<div class=" w-[75%] p-[10px] items-center rounded-[10px] pt-[10%] bg-[#db9db5] ">

<div class="w-[90%] flex justify-end mb-[20px]">
                <a href="<?=WEBROOT?>/?action=form-article">

                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg cursor-pointer hover:bg-[#45a049] ">Nouveau</button>
                </a>
            </div>
            <table class="w-[90%] mx-auto border-collapse">
                <thead>
                    <tr class="sticky top-0 bg-[#4b2433] text-white capitalize">
                        <th class="p-4 border-b">Id</th>
                        <th class="p-4 border-b">Libelle</th>
                        <th class="p-4 border-b">QteStock</th>
                        <th class="p-4 border-b">Prix</th>
                        <th class="p-4 border-b">Type</th>
                        <th class="p-4 border-b">Categorie</th>
                        <th class="p-4 border-b">Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article):?> 
                    <tr class="even:bg-black/5 hover:bg-white/90 transition duration-500">
                        <td class="p-4 border-b text-center"><?=$article["id"]?></td>
                        <td class="p-4 border-b text-center"><?=$article["libelle"]?></td>
                        <td class="p-4 border-b text-center"><?=$article["qteStock"]?></td>
                        <td class="p-4 border-b text-center"><?=$article["prixAppro"]?></td>
                        <td class="p-4 border-b text-center"><?=$article["nomType"]?></td>
                        <td class="p-4 border-b text-center font-bold"><?=$article["nomCategorie"]?></td>
                       
                            <td class="p-4 border-b text-center flex justify-around">
                            <form action="<?php WEBROOT?>" method="post">
                                <input type="hidden" name="id" value="<?=$article["id"]?>">
                                <button type="submit" class="text-green-700" name="action" value="edit-modifier">Modifier</button>
                            </form>
                            <form action="<?php WEBROOT?>" method="post">
                                <input type="hidden" name="id" value="<?=$article["id"]?>">
                                <button type="submit" name="action" value="edit-supprimer" class="text-red-700">Supprimer</button>
                            </form>
                            </td>
                    </tr>
                   <?php endforeach ?>
                </tbody>
            </table>
        </div>