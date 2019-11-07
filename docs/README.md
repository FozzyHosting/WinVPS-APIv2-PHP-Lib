## API Endpoints

All URIs are relative to */api/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BrandsApi* | [**brandsGet**](docs/Api/BrandsApi.md#brandsget) | **GET**: /brands | Returns list of all available preinstalled software set.
*JobsApi* | [**jobsGet**](docs/Api/JobsApi.md#jobsget) | **GET**: /jobs | List of all planned and completed commands.
*JobsApi* | [**jobsIdDelete**](docs/Api/JobsApi.md#jobsiddelete) | **DELETE**: /jobs/{id} | Cancel specified Job.
*JobsApi* | [**jobsIdGet**](docs/Api/JobsApi.md#jobsidget) | **GET**: /jobs/{id} | View single Job details.
*JobsApi* | [**jobsPendingGet**](docs/Api/JobsApi.md#jobspendingget) | **GET**: /jobs/pending | List of all planned commands.
*LocationsApi* | [**locationsGet**](docs/Api/LocationsApi.md#locationsget) | **GET**: /locations | Returns list of locations available for new machines.
*MachinesApi* | [**machinesGet**](docs/Api/MachinesApi.md#machinesget) | **GET**: /machines | Returns machines list in short form.
*MachinesApi* | [**machinesNameAddIpPost**](docs/Api/MachinesApi.md#machinesnameaddippost) | **POST**: /machines/{name}/add_ip | Send unary machine command
*MachinesApi* | [**machinesNameCommandPost**](docs/Api/MachinesApi.md#machinesnamecommandpost) | **POST**: /machines/{name}/{command} | Send single command which does not needs additional options.
*MachinesApi* | [**machinesNameDelete**](docs/Api/MachinesApi.md#machinesnamedelete) | **DELETE**: /machines/{name} | Terminate machine
*MachinesApi* | [**machinesNameGet**](docs/Api/MachinesApi.md#machinesnameget) | **GET**: /machines/{name} | Returns machine details
*MachinesApi* | [**machinesNameJobsGet**](docs/Api/MachinesApi.md#machinesnamejobsget) | **GET**: /machines/{name}/jobs | Returns list of jobs assigned to machine.
*MachinesApi* | [**machinesNamePost**](docs/Api/MachinesApi.md#machinesnamepost) | **POST**: /machines/{name} | Reinstall machine
*MachinesApi* | [**machinesNamePut**](docs/Api/MachinesApi.md#machinesnameput) | **PUT**: /machines/{name} | Update machine details
*MachinesApi* | [**machinesNameUsersGet**](docs/Api/MachinesApi.md#machinesnameusersget) | **GET**: /machines/{name}/users | Returns list of additional system users.
*MachinesApi* | [**machinesPost**](docs/Api/MachinesApi.md#machinespost) | **POST**: /machines | Create new machine.
*MachinesApi* | [**machinesRunningGet**](docs/Api/MachinesApi.md#machinesrunningget) | **GET**: /machines/running | Returns list of currently running machines.
*MachinesApi* | [**machinesStoppedGet**](docs/Api/MachinesApi.md#machinesstoppedget) | **GET**: /machines/stopped | Returns list of currently stopped or suspended machines.
*ProductsApi* | [**productsGet**](docs/Api/ProductsApi.md#productsget) | **GET**: /products | Returns list of all available products.
*TemplatesApi* | [**templatesGet**](docs/Api/TemplatesApi.md#templatesget) | **GET**: /templates | Returns list of all templates available for new machines.

## Models

 - [IP](docs/Model/IP.md)
 - [Brand](docs/Model/Brand.md)
 - [Template](docs/Model/TemplateDefinition.md)
 - [Job](docs/Model/JobDefinition.md)
 - [Location](docs/Model/LocationDefinition.md)
 - [Machine](docs/Model/MachineDefinition.md)
 - [MachineAdditions](docs/Model/MachineAdditionsDefinition.md)
 - [MachineConfig](docs/Model/MachineConfig.md)
 - [MachineEditableFields](docs/Model/MachineEditableFields.md)
 - [MachineOS](docs/Model/MachineOS.md)
 - [MachineReinstallableFields](docs/Model/MachineReinstallableFields.md)
 - [MachineNonReinstallableFields](docs/Model/MachineNonReinstallableFields.md)
 - [Product](docs/Model/ProductDefinition.md)
 - [ProductLimits](docs/Model/ProductDefinitionLimits.md)
 
## Responses/Requests
 - [CommandResult](docs/Model/CommandResult.md)
 - [ErrorResponse](docs/Model/ErrorResponse.md)
