## API Endpoints

All URIs are relative to */api/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BrandsApi* | [**brandsGet**](/Api/BrandsApi.md#brandsget) | **GET**: /brands | Returns list of all available preinstalled software set.
*JobsApi* | [**jobsGet**](/Api/JobsApi.md#jobsget) | **GET**: /jobs | List of all planned and completed commands.
*JobsApi* | [**jobsIdDelete**](/Api/JobsApi.md#jobsiddelete) | **DELETE**: /jobs/{id} | Cancel specified Job.
*JobsApi* | [**jobsIdGet**](/Api/JobsApi.md#jobsidget) | **GET**: /jobs/{id} | View single Job details.
*JobsApi* | [**jobsPendingGet**](/Api/JobsApi.md#jobspendingget) | **GET**: /jobs/pending | List of all planned commands.
*LocationsApi* | [**locationsGet**](/Api/LocationsApi.md#locationsget) | **GET**: /locations | Returns list of locations available for new machines.
*MachinesApi* | [**machinesGet**](/Api/MachinesApi.md#machinesget) | **GET**: /machines | Returns machines list in short form.
*MachinesApi* | [**machinesNameAddIpPost**](/Api/MachinesApi.md#machinesnameaddippost) | **POST**: /machines/{name}/add_ip | Send unary machine command
*MachinesApi* | [**machinesNameCommandPost**](/Api/MachinesApi.md#machinesnamecommandpost) | **POST**: /machines/{name}/{command} | Send single command which does not needs additional options.
*MachinesApi* | [**machinesNameDelete**](/Api/MachinesApi.md#machinesnamedelete) | **DELETE**: /machines/{name} | Terminate machine
*MachinesApi* | [**machinesNameGet**](/Api/MachinesApi.md#machinesnameget) | **GET**: /machines/{name} | Returns machine details
*MachinesApi* | [**machinesNameJobsGet**](/Api/MachinesApi.md#machinesnamejobsget) | **GET**: /machines/{name}/jobs | Returns list of jobs assigned to machine.
*MachinesApi* | [**machinesNamePost**](/Api/MachinesApi.md#machinesnamepost) | **POST**: /machines/{name} | Reinstall machine
*MachinesApi* | [**machinesNamePut**](/Api/MachinesApi.md#machinesnameput) | **PUT**: /machines/{name} | Update machine details
*MachinesApi* | [**machinesNameUsersGet**](/Api/MachinesApi.md#machinesnameusersget) | **GET**: /machines/{name}/users | Returns list of additional system users.
*MachinesApi* | [**machinesPost**](/Api/MachinesApi.md#machinespost) | **POST**: /machines | Create new machine.
*MachinesApi* | [**machinesRunningGet**](/Api/MachinesApi.md#machinesrunningget) | **GET**: /machines/running | Returns list of currently running machines.
*MachinesApi* | [**machinesStoppedGet**](/Api/MachinesApi.md#machinesstoppedget) | **GET**: /machines/stopped | Returns list of currently stopped or suspended machines.
*ProductsApi* | [**productsGet**](/Api/ProductsApi.md#productsget) | **GET**: /products | Returns list of all available products.
*TemplatesApi* | [**templatesGet**](/Api/TemplatesApi.md#templatesget) | **GET**: /templates | Returns list of all templates available for new machines.

## Models

 - [BrandDefinition](Model/BrandDefinition.md)
 - [BrandsList](Model/BrandsList.md)
 - [CommandResult](Model/CommandResult.md)
 - [ErrorResponse](Model/ErrorResponse.md)
 - [IpDefinition](Model/IpDefinition.md)
 - [JobDefinition](Model/JobDefinition.md)
 - [JobDetailsResponse](Model/JobDetailsResponse.md)
 - [JobsList](Model/JobsList.md)
 - [JobsListResponse](Model/JobsListResponse.md)
 - [LocationDefinition](Model/LocationDefinition.md)
 - [LocationsList](Model/LocationsList.md)
 - [LocationsListResponse](Model/LocationsListResponse.md)
 - [MachineAddIpResponse](Model/MachineAddIpResponse.md)
 - [MachineAddIpResponseData](Model/MachineAddIpResponseData.md)
 - [MachineAdditionsDefinition](Model/MachineAdditionsDefinition.md)
 - [MachineCommandResultResponse](Model/MachineCommandResultResponse.md)
 - [MachineCommandResultResponseData](Model/MachineCommandResultResponseData.md)
 - [MachineConfig](Model/MachineConfig.md)
 - [MachineCreateRequestBody](Model/MachineCreateRequestBody.md)
 - [MachineCreateResponse](Model/MachineCreateResponse.md)
 - [MachineCreateResponseData](Model/MachineCreateResponseData.md)
 - [MachineDefinition](Model/MachineDefinition.md)
 - [MachineDetailsResponse](Model/MachineDetailsResponse.md)
 - [MachineEditableFields](Model/MachineEditableFields.md)
 - [MachineListItem](Model/MachineListItem.md)
 - [MachineNonReinstallableFields](Model/MachineNonReinstallableFields.md)
 - [MachineOS](Model/MachineOS.md)
 - [MachineReinstallRequestBody](Model/MachineReinstallRequestBody.md)
 - [MachineReinstallableFields](Model/MachineReinstallableFields.md)
 - [MachineUpdateRequestBody](Model/MachineUpdateRequestBody.md)
 - [MachineUserDefinition](Model/MachineUserDefinition.md)
 - [MachineUsersList](Model/MachineUsersList.md)
 - [MachineUsersListResponse](Model/MachineUsersListResponse.md)
 - [MachinesList](Model/MachinesList.md)
 - [MachinesListResponse](Model/MachinesListResponse.md)
 - [PaginationDetails](Model/PaginationDetails.md)
 - [ProductDefinition](Model/ProductDefinition.md)
 - [ProductDefinitionLimits](Model/ProductDefinitionLimits.md)
 - [ProductsList](Model/ProductsList.md)
 - [ProductsListResponse](Model/ProductsListResponse.md)
 - [TemplateDefinition](Model/TemplateDefinition.md)
 - [TemplatesList](Model/TemplatesList.md)
 - [TemplatesListResponse](Model/TemplatesListResponse.md)
