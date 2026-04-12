<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 *
 * @category  Amadeco
 * @package   Amadeco_SmileCustomEntityLayeredNavigation
 * @copyright Copyright (c) Amadeco (https://www.amadeco.fr) - Ilan Parmentier
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */
declare(strict_types=1);

namespace Amadeco\SmileCustomEntityLayeredNavigation\Model\Layer;

use Magento\Eav\Api\Data\AttributeSetInterface;
use Amadeco\SmileCustomEntityLayeredNavigation\Model\Layer\CollectionFilterInterface;

class CollectionFilter implements CollectionFilterInterface
{
    /**                                                                                                                         
     * Filter entity collection                                                                                                 
     *                                                                                                                          
     * Loads all EAV attributes via addAttributeToSelect('*') to match the behavior of                                          
     * CustomEntityRepository::getList(), which is the standard loading path used by entity                                     
     * sets without filterable attributes. A previous hardcoded whitelist of 4 attributes                                       
     * caused any custom attribute (e.g. resume, description) to be silently absent from                                        
     * templates when the layered navigation path was active. Selecting '*' ensures parity                                      
     * regardless of which attributes exist now or are added in the future.
     *                                                                                                                          
     * @param $collection
     * @param AttributeSetInterface $entity
     * @return void                                                                                                             
     */
    public function filter(
        $collection,
        AttributeSetInterface $entity
    ) {
        $collection->addAttributeToSelect('*');
    }
}
