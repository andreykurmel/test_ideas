# IDEAS

Repository pattern with DTO benefits:
> All database actions are in one place.
> 
> Structure is comfortable for Testing.
> 
> Caching and any wrapper for 'Repositories' can be added easily
> 
> Data is agnostic from storage (database, api, file, ...)
> 
> Serialized 'Entites' less than 'Models' in 6-10 times. Good for caching and memory.


Code Style Guide:
> 'Models' must be used just in 'Repositories'.
> 
> All 'Models' must be transformed to 'DataTransferObjects' to work across the application.
> 
> Creating of 'Repositories' can we wrapped in 'Factories' just for convenience
