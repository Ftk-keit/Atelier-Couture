<div class="w-[78%] p-[10px] justify-center items-center rounded-[10px] pt-[3%] bg-[#db9db5] flex">
    <div class="w-[60%] flex justify-center mb-[20px] bg-[#4b2433] p-[2%] rounded-[10px]">
        <form method="post" action="">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-[#ffffff]">Libelle</label>
                            <div class="mt-2">
                                <input type="text" name="libelle" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-[#ffffff]">Quantite en stock</label>
                            <div class="mt-2">
                                <input id="email" name="qteStock" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-[#ffffff]">Prix unitaire</label>
                            <div class="mt-2">
                                <input type="text" name="prixAppro" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="type" class="block text-sm font-medium leading-6 text-[#ffffff]">Type</label>
                            <div class="mt-2">
                                <select id="type" name="nomType" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <?php foreach ($structData['types'] as $type): ?>
                                        <option value="<?= htmlspecialchars($type['id']) ?>"><?= htmlspecialchars($type['nomType']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="categorie" class="block text-sm font-medium leading-6 text-[#ffffff]">Categorie</label>
                            <div class="mt-2">
                                <select id="categorie" name="nomCategorie" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <?php foreach ($structData['categories'] as $categorie): ?>
                                        <option value="<?= htmlspecialchars($categorie['id']) ?>"><?= htmlspecialchars($categorie['nomCategorie']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <input type="hidden" name="action" value="save-article">
                <button type="button" class="text-sm font-semibold leading-6 text-[#ffffff]">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>
